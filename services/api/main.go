package main

import (
	"fmt"
	"http"
	"os"
)

// handle a basic ping/pong response over HTTP
func pingHandler(w http.ResponseWriter, r *http.Request) {
	fmt.Fprintf(w, "pong")
}
http.Handle("/ping", pingHandler)

// get the port
port := fmt.Sprintf(":%s", os.GetEnv("PORT"))
if os.GetEnv("PORT") == nil {
	port = ":8080"
}

log.Fatal(http.ListenAndServe(port, nil))