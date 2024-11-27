import sys, requests, json

if "version" in sys.argv:
    try:
        setup_version = sys.argv[sys.argv.index("version") + 1]
    except KeyError:
        print("No Version Defined")
        sys.exit()
else:
    print("Version Required")
    sys.exit()

versions = requests.api.get('https://api.papermc.io/v2/projects/paper')
if versions.status_code == 200:
    versions = versions.json()
    versions = versions["versions"]

if setup_version in versions:
    print(f"Starting Setup for {setup_version}")
    builds = requests.api.get(f'https://api.papermc.io/v2/projects/paper/versions/{setup_version}')
    if builds.status_code == 200:
        builds = builds.json()
        builds = builds["builds"]
        setup_build = builds[len(builds) - 1]
        print(f"Gathered Latest {setup_version} build {setup_build}")

        downloads = requests.api.get(f'https://api.papermc.io/v2/projects/paper/versions/{setup_version}/builds/{setup_build}')
        if downloads.status_code == 200:
            downloads = downloads.json()
            setup_download = downloads["downloads"]["application"]["name"]
            print(f'Found {setup_version} build {setup_build} file {setup_download}')

            file = requests.api.get(f'https://api.papermc.io/v2/projects/paper/versions/{setup_version}/builds/{setup_build}/downloads/{setup_download}')
            if file.status_code == 200:
                serverJar = open("server.jar", "wb")
                serverJar.write(file.content)
                serverJar.close()
else:
    print(f"Invalid Version {setup_version}")
