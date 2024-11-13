#!/bin/python3.11

import json
import os
import urllib.error
import urllib.request
import shutil
import mimetypes

def acquire(game_id=None, url=None):
    responses = []
    if url != None:
        req = urllib.request.Request(str(url))
        try:
            with urllib.request.urlopen(req) as response:
                print(f"Asset {url} Acquired")
                responses.append({"name":None, "info":response.info(), "dat":response.read()})
        except urllib.error.HTTPError:
            responses.append({"name":None, "info":None, "dat":None})
            print(f"Asset {url} Failed")
    else:
        for link in links:
            req = urllib.request.Request(str(link["url"]).replace("<APP-ID>", str(game_id)))
            try:
                with urllib.request.urlopen(req) as response:
                    print(f"Asset {game_id} Acquired")
                    responses.append({"name":f"{link['name']}", "info":response.info(), "dat":response.read()})
            except urllib.error.HTTPError:
                responses.append({"name":f"{link['name']}", "info":None, "dat":None})
                print(f"Asset {game_id} Failed")
        
    return responses

root = os.path.dirname(__file__)
links = json.load(open(f"{root}/links.json", "r"))
games = json.load(open(f"{root}/games.json", "r"))

for game in games:

    # Make Game Root
    game_root = f"{root}/assets/{game['name']}"
    if not os.path.exists(game_root):
        os.makedirs(game_root, exist_ok=True)

    # Determine DLCS
    try:
        game["dlcs"]
        DLCS = 1
        print(f"\nGame [{game['name']}] Has {len(game['dlcs'])} Defined DLCS")
    except KeyError:
        DLCS = 0
        print(f"\nGame [{game['name']}] Has 0 Defined DLCS")

    # Determine Extras
    try:
        game["extras"]
        EXTRAS = 1
        print(f"\nGame [{game['name']}] Has {len(game['extras'])} Defined Extras")
    except KeyError:
        EXTRAS = 0
        print(f"\nGame [{game['name']}] Has 0 Defined Extras")

    # Acquire Game Media
    for response in acquire(game["id"]):
        if response["dat"] == None:
            continue
        ext = mimetypes.guess_extension(response["info"]["content-type"])
        file = f"{game_root}/{game['name']}_{game['id']}_{response['name']}{ext}"

        with open(file, "wb") as f:
            f.write(response["dat"])

    if DLCS == 1:
        for dlc in game["dlcs"]:
            for response in acquire(dlc["id"]):
                if response["dat"] == None:
                    continue
                ext = mimetypes.guess_extension(response["info"]["content-type"])
                file = f"{game_root}/{game['name']}_{game['id']}_{dlc['name']}_{dlc['id']}_{response['name']}{ext}"

                with open(file, "wb") as f:
                    f.write(response["dat"])

    if EXTRAS == 1:
        for extra in game["extras"]:
            for response in acquire(url=extra["url"]):
                if response["dat"] == None:
                    continue
                ext = mimetypes.guess_extension(response["info"]["content-type"])
                file = f"{game_root}/{game['name']}_{game['id']}_{extra['name']}_{extra['id']}{ext}"

                with open(file, "wb") as f:
                    f.write(response["dat"])