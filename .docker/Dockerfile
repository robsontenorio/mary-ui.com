FROM robsontenorio/laravel:3.0 as base
COPY --chown=appuser:appuser . .

FROM base as local
CMD ["/usr/local/bin/start"]

FROM base as deploy
RUN chmod a+x .docker/deploy.sh
CMD ["/bin/sh", "-c", ".docker/deploy.sh && /usr/local/bin/start"]

