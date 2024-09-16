FROM node:latest
WORKDIR /app
RUN curl -sSL https://rover.apollo.dev/nix/latest | sh
COPY ./apollo /app
RUN npm install
CMD ["npm", "start"]