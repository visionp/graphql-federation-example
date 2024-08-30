PROJECTNAME=$(shell basename "$(PWD)")

GOOS ?= $(shell go env GOOS || echo linux)
GOARCH ?= $(shell go env GOARCH || echo amd64)

.PHONY: dependencies gqlgen-generate build init-test-env test clean check lint

dependencies: ## generate dependencies
	go mod download

gqlgen: ## generate graphql resolver
	go run -mod=mod github.com/99designs/gqlgen generate

build:
	GOOS=${GOOS} CGO_ENABLED=${CGO_ENABLED} GOARCH=${GOARCH} \
	go build  -o ${PROJECTNAME} main.go
