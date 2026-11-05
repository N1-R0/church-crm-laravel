# Verification record

Verification was performed on 5 November 2026.

## Completed in the build environment

- Parsed all 12 TypeScript/TSX files with the TypeScript compiler parser: no syntax errors.
- Validated 56 PHP source files for opening tags and balanced delimiters.
- Parsed every JSON configuration file.
- Confirmed migration coverage for users, households, ministry groups, members, devotion sessions, attendance, donations, communications, pastoral notes, dashboard metric snapshots, notifications, audit logs, sessions, and cache.
- Confirmed the public search/check-in throttles, role middleware, pastoral-note route, PostgreSQL driver, database sessions, and Vercel container entrypoint are present.
- Scanned source files for committed environment files, private keys, live Laravel keys, `eval`, and shell execution primitives: no findings.

## Environment limitation

The build environment's package proxy returned HTTP 403 for npm packages, and the environment did not include PHP/Composer or Docker. Consequently, dependency-resolved `npm run build`, PHPUnit, Pint, Composer validation, and a Docker image build could not be executed here. The failure was environmental rather than a source error.

Run the following in a networked development or CI environment before production deployment:

```bash
npm install
npm run typecheck
npm run build
composer install
composer validate --strict
composer test
./vendor/bin/pint --test
docker build -f Dockerfile.vercel -t shepherd-church-crm .
```

## Manual acceptance path

1. Sign in as administrator.
2. Confirm dashboard metrics render.
3. Search and filter members.
4. Create and edit a member with household and ministry assignments.
5. Record giving and communications.
6. Confirm staff cannot see pastoral notes; confirm pastor/admin can.
7. Create an attendance session, open it, scan/open its QR link, search for a member, and check in.
8. Repeat the check-in and confirm a duplicate record is not created.
9. Register a fictional new member from the public page.
10. Close the session and confirm further check-ins are rejected.
11. Confirm `/health` returns HTTP 200 in the deployed environment.
