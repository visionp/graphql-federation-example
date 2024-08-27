FROM golang:1.22
WORKDIR /app

COPY ./golang/go.mod ./golang/go.sum ./
RUN go mod download
ADD ./golang .
RUN go build -o graphql-golang .

EXPOSE 8080

CMD ["./graphql-golang", "api"]
