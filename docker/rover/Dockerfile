FROM debian:stable-slim AS installer
RUN apt update && apt install -y curl
RUN curl -sSL https://rover.apollo.dev/nix/v0.26.2 | sh

FROM debian:stable-slim AS runner
RUN apt update && apt install -y ca-certificates && rm -rf /var/lib/apt/lists/* && apt-get clean

WORKDIR /app
COPY --from=installer /root/.rover/bin/rover /root/.rover/bin/rover
ENV PATH="/root/.rover/bin:${PATH}"

CMD ["/root/.rover/bin/rover", "supergraph", "compose", "--config", "./supergraph.yaml", "--elv2-license", "accept", "--output", "federation-schema.graphql"]

