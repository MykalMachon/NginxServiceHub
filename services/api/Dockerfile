FROM golang:1.21.6

# copy over the source code
WORKDIR /opt/api
COPY go.mod go.mod
COPY *.go . 

# build the app 
RUN CGO_ENABLED=0 GOOS=linux go build -o nsh-api 

# run the app 
CMD ["./nsh-api"]