FROM node:latest
WORKDIR /app

COPY ./apollo/package.json ./apollo/package-lock.json ./
RUN npm instal

CMD ["npm", "start"]