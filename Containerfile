FROM php:8.4-cli

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git

COPY --from=docker.io/composer /usr/bin/composer /usr/bin/composer
RUN useradd -m dev
WORKDIR /examples
