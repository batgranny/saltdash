# saltdash

## What is Saltdash?

Saltdash is a basic web based tool for viewing and searching an external MariaDB / MySQl **Saltstack job cache** written in PHP.

### Prerequisites
An external job cache for your salt master [see the Saltstack documentation](http://https://docs.saltproject.io/en/latest/topics/jobs/external_cache.html#external-job-cache)

## Features

- Job search. 

- It looks nice so it's better that mucking around in the Salt cli.

- That's really it.

# Running Saltdash
1. Clone the [repository](https://github.com/batgranny/saltdash.git) and use [docker-compose](https://docs.docker.com/compose/):

```commandline
git clone https://github.com/batgranny/saltdash.git
cd saltdash
```
2. Copy the SAMPLE.env to .env (just .env don't put a name in front of the extension)
3. Fill in the database connection information in the .env file
3. Run `docker-compose up -d`




