package main

import (
	"fmt"
	"log/slog"
	"net/http"
	"os"
)

var log slog.Logger = *slog.New(slog.NewJSONHandler(os.Stdout, nil))

func pingHandler(w http.ResponseWriter, r *http.Request) {
	log.Info("RESP", "addr", r.RemoteAddr, "method", r.Method, "URL", r.URL.Path)
	fmt.Fprintf(w, "pong")
}

func main() {
	// handle a basic ping/pong response over HTTP

	http.HandleFunc("/ping", pingHandler)

	// get the port
	port := fmt.Sprintf(":%s", os.Getenv("PORT"))
	if os.Getenv("PORT") == "" {
		port = ":8080"
	}

	log.Info(fmt.Sprintf("Server started on port %s", port))
	http.ListenAndServe(port, http.DefaultServeMux)
}
