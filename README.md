# saltdash

## What is Saltdash?
<img align="right" height="200" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/af/D20_icon.png/640px-D20_icon.png">
Saltdash is a basic web based tool for viewing and searching an external MariaDB / MySQL **Saltstack job cache** written in PHP.

### Prerequisites
An external job cache for your salt master [see the Saltstack documentation](http://https://docs.saltproject.io/en/latest/topics/jobs/external_cache.html#external-job-cache)

## Features

- Job search. 

- It looks nice so it's better than all that mucking around in the Salt cli.

- That's really it.

## Screenshots
![Alt text](/img/screenshot1.png?raw=true "Main page")

![Alt text](/img/screenshot2.png?raw=true "details page page")

## Running Saltdash
1. Clone the [repository](https://github.com/batgranny/saltdash.git) and use [docker-compose](https://docs.docker.com/compose/):

```commandline
git clone https://github.com/batgranny/saltdash.git
cd saltdash
```
2. Copy the SAMPLE.env to .env (just .env don't put a name in front of the extension)

```commandline
MYUSER=user
MYPASS=password
MYDB=salt
MYHOST=dbhost
SALTGUI=saltguihost
```

3. Fill in the database connection information in the .env file
3. Run `docker-compose up -d`
4. Connect on [http://yourhost:8000](http://yourhost:8000)

## Disclaimer
This code is provided as is and is really just for my own use. I built it using extremely rudimentary and probably antiquated PHP skills so it's very basic and probably not the most elegant or secure thing in the world.  If you fancy using it and it doesn't work I won't be fixing it.


