#!/usr/bin/env bash

set -e

# prepare the source of icons by cloning the repo
TEMP_DIR=blade-icon-temp-dir
DIRECTORY=$(cd `dirname $0` && pwd)

mkdir -p $TEMP_DIR
SOURCE=$TEMP_DIR/cryptocurrency-icons
git clone git@github.com:spothq/cryptocurrency-icons.git $TEMP_DIR/cryptocurrency-icons
# cd $SOURCE
# git pull
# cd $DIRECTORY/../
RESOURCES=$DIRECTORY/../resources/svg

echo $SOURCE
echo "Reading categories"
for ICON_DIR in $SOURCE/svg/black/*; do
    # Icon Directory Path
    # echo $ICON_DIR
    # exit

    # Icon Name
    ICON_NAME=${ICON_DIR##*/}
    # echo $ICON_NAME

    CP_COMMAND='cp '$ICON_DIR' '$RESOURCES/$ICON_NAME
    $CP_COMMAND
    # exit

done

echo "copied all svgs!"

echo "All Done!"
# echo "Run `php bin/compile.php` to update the svgs"
