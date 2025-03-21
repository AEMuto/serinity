#!/bin/bash

# Theme Release Script for Serinity Theme
# Usage: ./theme-release.sh [version]

# Configuration
THEME_NAME="serinity"
VERSION=${1:-"1.0.0"} # Default to 1.0.0 if no version is provided
RELEASE_DIR="./releases"
SOURCE_DIR="."
BUILD_DIR="${RELEASE_DIR}/${THEME_NAME}"
OUTPUT_FILE="${RELEASE_DIR}/${THEME_NAME}-${VERSION}.zip"

# Ensure the release directory exists
mkdir -p "${RELEASE_DIR}"

# Remove any previous build directory
if [ -d "${BUILD_DIR}" ]; then
  rm -rf "${BUILD_DIR}"
fi

# Create a fresh build directory
mkdir -p "${BUILD_DIR}"

# Copy only the necessary files and directories
echo "Copying theme files..."

# Core files
cp "${SOURCE_DIR}/style.css" "${BUILD_DIR}/"
cp "${SOURCE_DIR}/theme.json" "${BUILD_DIR}/"
cp "${SOURCE_DIR}/functions.php" "${BUILD_DIR}/"
cp "${SOURCE_DIR}/vite.config.js" "${BUILD_DIR}/"
cp "${SOURCE_DIR}/package.json" "${BUILD_DIR}/"
cp "${SOURCE_DIR}/readme.txt" "${BUILD_DIR}/"

# Copy screenshot if it exists
if [ -f "${SOURCE_DIR}/screenshot.png" ]; then
  cp "${SOURCE_DIR}/screenshot.png" "${BUILD_DIR}/"
fi

# Copy directories
echo "Copying directories..."
mkdir -p "${BUILD_DIR}/templates"
mkdir -p "${BUILD_DIR}/assets"
mkdir -p "${BUILD_DIR}/patterns"
mkdir -p "${BUILD_DIR}/parts"
mkdir -p "${BUILD_DIR}/blocks/build"

# Copy contents of directories
cp -r "${SOURCE_DIR}/templates/"* "${BUILD_DIR}/templates/" 2>/dev/null || true
cp -r "${SOURCE_DIR}/assets/"* "${BUILD_DIR}/assets/" 2>/dev/null || true
cp -r "${SOURCE_DIR}/patterns/"* "${BUILD_DIR}/patterns/" 2>/dev/null || true
cp -r "${SOURCE_DIR}/parts/"* "${BUILD_DIR}/parts/" 2>/dev/null || true
cp -r "${SOURCE_DIR}/blocks/build/"* "${BUILD_DIR}/blocks/build/" 2>/dev/null || true

# Create the zip file
echo "Creating zip file..."
# Change to the releases directory
cd "${RELEASE_DIR}"
# Zip the theme directory
zip -r "${THEME_NAME}-${VERSION}.zip" "${THEME_NAME}"

# Check if zip was successful
if [ $? -eq 0 ]; then
    echo "Release created successfully: ${OUTPUT_FILE}"
    echo "Theme: ${THEME_NAME}"
    echo "Version: ${VERSION}"
else
    echo "Error: Failed to create zip file."
    exit 1
fi

# Clean up the build directory (optional - you may want to keep it for debugging)
# rm -rf "${BUILD_DIR}"