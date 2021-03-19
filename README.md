# Project: AzCloud

## Requirements
- **docker** and **docker-compose**
- **make** executable

## Initialization
- `git clone the repository` && `cd src/`
- `copy .env.example to .env`
- `make init`

## Synchronization of flavors
- `make sync`

# Notes
- Add application related credentials to **.env** file.
- **SQL dump** location - ./src/azcloud.sql (You need import this after initialization)
- For synchronization **flavors** you need to add correct **AWS bucket**  credentials to **.env** file.