# Echidnr CTF Challenge

```
     ______     __    _     __              __________________   ________          ____                    
    / ____/____/ /_  (_)___/ /___  _____   / ____/_  __/ ____/  / ____/ /_  ____ _/ / /__  ____  ____ ____ 
   / __/ / ___/ __ \/ / __  / __ \/ ___/  / /     / / / /_     / /   / __ \/ __ `/ / / _ \/ __ \/ __ `/ _ \
  / /___/ /__/ / / / / /_/ / / / / /     / /___  / / / __/    / /___/ / / / /_/ / / /  __/ / / / /_/ /  __/
 /_____/\___/_/ /_/_/\__,_/_/ /_/_/      \____/ /_/ /_/       \____/_/ /_/\__,_/_/_/\___/_/ /_/\__, /\___/ 
                                                                                              /____/      
```

Welcome to the Echidnr CTF Challenge!

This challenge includes a vulnerable image hosting service, can you find the exploit to obtain the flag?
The service is hosted on TCP port 8082, no other ports are a part of this challenge.

## Requirements
Linux
- Docker
- Docker Compose

Windows
 - Docker Desktop

## Docker Installation
Linux
 - Docker: https://docs.docker.com/engine/install/
 - Docker Compose: https://docs.docker.com/compose/install/

 Windows
 - Docker Desktop: https://docs.docker.com/desktop/setup/install/windows-install/

## Setup Instructions
1. Extract the challenge files
2. Navigate to the directory containing this file
3. Build and start the containers:
 - Linux
```bash
     docker-compose up
```
 - Windows
```.cmd
     Windows
     docker compose up
```
4. Access the challenge at: http://localhost:8082
5. When finished, stop the containers:
 - Linux
```bash
     docker-compose down
```
 - Windows
```.cmd
     docker compose down
```

## Troubleshooting
If you encounter issues, try rebuilding from scratch:
 - Linux
```bash
     docker-compose down -v
     docker-compose build --no-cache
     docker-compose up -d
```

 - Windows
 ```.cmd
     docker compose down -v
     docker compose build --no-cache
     docker compose up -d
```

## Walkthrough
