# Agent Self-Evaluation

A Laravel web app where support centre agents log a quick self-evaluation after each issue they handle, and administrators review those evaluations per agent or across the whole team.

> **Note:** This is a personal homelab project I built while learning Laravel. It is not deployed or used in production anywhere.

**Version 1.0**

---

## Features

- **Self-evaluation form.** After handling an issue/ticket, an agent records the issue/ticket number, whether they think the  client was satisfied (Yes / No / Maybe), their confidence level (High / Medium / Low) and a 1–5 self-rating. The date and the agent's name are filled in automatically.
- **My Reports.** Each agent gets a searchable, sortable table of their own past evaluations.
- **Admin dashboard.** Admins see a card for every agent and can open one agent's evaluations or every evaluation at once.
- **Colour-coded ratings.** Ratings are shaded from red (1 – Poor) through yellow to green (5 – Excellent), so weak spots stand out in the tables.
- **Interactive tables.** Every report view uses DataTables for paging, search and column sorting.
- **Authentication.** Laravel's standard registration, login, logout and password reset.

## Tech stack

| Layer | Technology |
|---|---|
| Backend | PHP 7.1+, Laravel 5.6 |
| Views | Blade templates, Bootstrap 4, Font Awesome 4.7 |
| Tables | jQuery and DataTables 1.10, loaded from CDNs |
| Database | MySQL for local development; PostgreSQL via `DATABASE_URL` for the Heroku setup |
| Front-end build | Laravel Mix 2 (Webpack). The compiled CSS and JS are committed in `public/` |
| Hosting | Configured for Heroku (`Procfile` serves `public/` with Apache); not deployed |

## How it works

1. Visiting `/` shows the login page. New users can register.
2. After login, `/home` checks the user's email against a list of admin emails in `HomeController`.
   - **Agents** see a dashboard with two options: **Evaluate** (add a new evaluation) and **My Reports**.
   - **Admins** see a card for each non-admin user, plus an **All Agents** card.
3. Submitting the evaluation form posts to `/agents`, which validates the input and saves one row to the `agents` table.
4. Report pages render the saved rows in a DataTables table with colour-coded ratings.

### Routes

Every route except `/` and the auth pages requires a logged-in user.

| Method | URI | Name | Handler | Purpose |
|---|---|---|---|---|
| GET | `/` | | closure | Login page |
| GET | `/home` | `home` | `HomeController@index` | Agent or admin dashboard, depending on email |
| GET | `/agent/add` | `agentadd` | `AgentController@index` | Self-evaluation form |
| POST | `/agents` | | `AgentController@store` | Save an evaluation |
| GET | `/agent/view` | `agentview` | `AgentController@showAll` | The logged-in agent's own evaluations |
| GET | `/admin/{id}` | `singleagent` | `AgentController@showSingleAgent` | One user's evaluations by user ID, or every evaluation when `{id}` is `all` |
| GET | `/agent/admin` | `adminhome` | `HomeController@adminIndex` | Admin view (see [Known issues](#known-issues)) |
| GET/POST | `/login`, `/register`, `/logout`, `/password/*` | | Auth controllers | Laravel auth scaffolding |

## Known issues

- **Admin list must be filled in.** `HomeController` won't parse until the admin emails are added (Next step will be to implement role based access control).
- **Admin pages aren't access-controlled.** `/admin/{id}` and `/agent/admin` only check that someone is logged in, and registration is open, so any registered user can view every evaluation at `/admin/all`. Add an admin check (middleware or a Gate) before using real data.
- **`/agent/admin` errors.** `HomeController@adminIndex` doesn't pass `$users` to the view, so the page throws an undefined-variable error. The working admin dashboard is at `/home`.
- **Loose form validation.** The "Choose" placeholder in the two dropdowns submits as a real value and passes the `required` rule, and the rating isn't checked server-side to be 1–5. Rules such as `in:Yes,No,Maybe` and `integer|between:1,5` would fix this.
- **"My Reports" matches by name.** It filters on the user's display name rather than their ID, so two users with the same name see each other's evaluations. Filtering on `fk_user` avoids this.
- **End-of-life dependencies.** Laravel 5.6 and PHP 7.x no longer receive security fixes.
