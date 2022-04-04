# saltdash
A basic dashboard for viewing a Saltack mariadb job cache

### Prerequisites
Set up and external job cache for your salt master [see the Saltstack documentation](http://https://docs.saltproject.io/en/latest/topics/jobs/external_cache.html#external-job-cache)

### Running Saltdash
1. Copy the SAMPLE.env to .env (just .env don't put a name in front of the extension)
2. Fill in the database connection information in the .env file
3. Run 

```bash
docker-compose up -d
```