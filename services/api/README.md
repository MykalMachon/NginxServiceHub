## Nginx Service Hub API

## Docker Commands

This uses docker to build the image. Please use the commands below for reference and testing locally.

### Build command 

```bash
docker build --tag nsh-api .
```

### Run Command

```bash
docker run -p="80:8080" nsh-api
```