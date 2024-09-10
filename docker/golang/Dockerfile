FROM golang:1.22-alpine as build
WORKDIR /build

ADD ./book-service .
RUN go build -o book-service .

FROM alpine:3.16

WORKDIR /app
COPY --from=build /build/book-service ./

EXPOSE 8080
CMD ["./book-service", "api"]
