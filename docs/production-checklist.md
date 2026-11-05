# Production checklist

## Before deployment

- [ ] Replace the demo church name and fictional seed records.
- [ ] Use a pooled, TLS-enabled PostgreSQL connection.
- [ ] Generate separate `APP_KEY` values for Preview and Production.
- [ ] Set `APP_DEBUG=false` and `LOG_CHANNEL=stderr`.
- [ ] Run `composer test`, `npm run build`, and `./vendor/bin/pint --test`.
- [ ] Run `php artisan migrate --force` once in a controlled release step.
- [ ] Seed the first administrator using a long random password; rotate it after first login.
- [ ] Confirm the Vercel `/health` endpoint.

## Security and privacy

- [ ] Define who may access giving, communications, and pastoral notes.
- [ ] Review data-retention and deletion requirements.
- [ ] Add MFA/SSO before broad staff rollout if required by policy.
- [ ] Add bot protection to public check-in for high-risk or internet-wide use.
- [ ] Configure database backups and test restoration.
- [ ] Review audit logs and alerting.
- [ ] Never use real member data in Preview deployments.

## Operations

- [ ] Use object storage for future uploads; never rely on the container filesystem.
- [ ] Use a durable external queue for bulk email/SMS.
- [ ] Call scheduled tasks through authenticated Vercel Cron endpoints.
- [ ] Monitor database connection counts, error rate, and function duration.
