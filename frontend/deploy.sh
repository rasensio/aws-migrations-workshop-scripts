#!/bin/bash

# abort on errors
set -e

# build
npm run build

# navigate into the build output directory
cd dist
zip -r frontend.zip .

DATE=$(date +%Y-%m-%d)
git add *
git commit -m"deployment of $DATE"
git push