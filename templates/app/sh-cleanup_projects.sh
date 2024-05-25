#!/bin/bash

# List of project directories
projects=(
    "electronjs-boilerplate"
    "expo-boilerplate"
    "fastifyjs-mongodb-boilerplate"
    "fastifyjs-mysql-boilerplate"
    "gatsbyjs-boilerplate"
    "nextjs-boilerplate"
    "nodejs-mongodb-boilerplate"
    "nodejs-mysql-boilerplate"
    "react-native-boilerplate"
    "reactjs-boilerplate"
    "reactjs-chrome-extension-boilerplate"
    "reactjs-webpack-boilerplate"
    "t3js-boilerplate"
)

# Loop through each project directory and remove specified files/folders
for project in "${projects[@]}"; do
    echo "Cleaning up $project"
    cd "$project"
    
    # Remove node_modules directory if it exists
    if [ -d node_modules ]; then
        echo "Removing node_modules from $project"
        rm -rf node_modules
    fi
    
    # Remove .next directory if it exists
    if [ -d .next ]; then
        echo "Removing .next from $project"
        rm -rf .next
    fi
    
    # Remove .expo directory if it exists
    if [ -d .expo ]; then
        echo "Removing .expo from $project"
        rm -rf .expo
    fi
    
    # Remove yarn.lock file if it exists
    if [ -f yarn.lock ]; then
        echo "Removing yarn.lock from $project"
        rm yarn.lock
    fi
    
    # Go back to the parent directory
    cd ..
done

echo "Cleanup completed for all projects."
