FROM golang:1.22
WORKDIR /app

COPY ./book-service/go.mod ./book-service/go.sum ./
RUN go mod download
ADD ./book-service .
RUN go build -o book-service .

EXPOSE 8080

CMD ["./book-service", "api"]
