# Prototype-to-Laravel mapping

| Supplied prototype concern | Laravel implementation |
|---|---|
| Login and local demo auth | Real Laravel session authentication, rate limiting, active-account enforcement |
| Dashboard cards and charts | `DashboardController` aggregates live member, attendance, and donation records; React renders responsive charts |
| Member list/search/filter | `MemberController@index`, Eloquent search scope, validated filters, and pagination |
| Member profile | Household, ministry, attendance, giving, communications, and authorization-aware pastoral tabs |
| Add/edit member | `StoreMemberRequest`, database transaction, ministry pivot synchronization |
| Household | `households` migration and `Household` model with one-to-many members |
| Ministry group | `ministry_groups` plus many-to-many pivot and membership metadata |
| Devotion session | `devotion_sessions` migration, staff session management, random QR tokens |
| Existing-member QR check-in | Masked public search, throttling, open-session validation, unique attendance key |
| New-member registration | Validated public registration and attendance transaction |
| Donations | Monetary/currency/fund/receipt schema and member activity endpoint |
| Communications | Inbound/outbound history, delivery status, creator attribution |
| Pastoral notes | Confidential-note schema plus pastor/admin policy boundary |
| Dashboard metric snapshots | `dashboard_metrics` migration retained for historical reporting; current dashboard uses live source data |
| Notifications | User-targeted notification schema and model |
| Production auditability | Generic audit event table and model hooks for sensitive CRM entities |
