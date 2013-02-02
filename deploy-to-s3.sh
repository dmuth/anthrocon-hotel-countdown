#!/bin/bash
#
# This script copies all of our assets up to S3.
#

#
# Errors are fatal
#
set -e


OPTIONS="-P"
#OPTIONS="${OPTIONS} --dry-run " # Debugging

LOCAL_BASE="`dirname $0`/content"
S3_BASE="s3://anthrocon/AC2013/hotel"

s3cmd ${OPTIONS} put ${LOCAL_BASE}/style.css ${S3_BASE}/style.css
s3cmd ${OPTIONS} -r put ${LOCAL_BASE}/js-clock/css ${S3_BASE}/js-clock/
s3cmd ${OPTIONS} -r put ${LOCAL_BASE}/js-clock/img ${S3_BASE}/js-clock/
s3cmd ${OPTIONS} -r put ${LOCAL_BASE}/js-clock/js ${S3_BASE}/js-clock/


