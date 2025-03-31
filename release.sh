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

# Define required directories and files
REQUIRED_DIRS=(
  "templates"
  "assets"
  "patterns"
  "parts"
  "blocks/build"
  "includes"  # Add the missing includes directory
)

REQUIRED_FILES=(
  "style.css"
  "theme.json"
  "functions.php"
  "vite.config.js"
  "package.json"
  "readme.txt"
  "includes/cf7-systemeio.php"  # Add the missing file
)

# Ensure the release directory exists
mkdir -p "${RELEASE_DIR}"

# Remove any previous build directory
if [ -d "${BUILD_DIR}" ]; then
  rm -rf "${BUILD_DIR}"
fi

# Create a fresh build directory
mkdir -p "${BUILD_DIR}"

# Check for required files before proceeding
echo "Checking for required files..."
MISSING_FILES=0
for file in "${REQUIRED_FILES[@]}"; do
  if [ ! -f "${SOURCE_DIR}/${file}" ]; then
    echo "WARNING: Required file not found: ${file}"
    MISSING_FILES=$((MISSING_FILES+1))
  fi
done

if [ $MISSING_FILES -gt 0 ]; then
  echo "Found ${MISSING_FILES} missing files. Continue anyway? (y/n)"
  read -r CONTINUE
  if [[ $CONTINUE != "y" && $CONTINUE != "Y" ]]; then
    echo "Release aborted."
    exit 1
  fi
  echo "Continuing despite missing files..."
fi

# Copy core files
echo "Copying theme files..."
for file in "${REQUIRED_FILES[@]}"; do
  # Create directory structure if needed
  dir=$(dirname "${BUILD_DIR}/${file}")
  mkdir -p "$dir"
  
  # Copy file if it exists
  if [ -f "${SOURCE_DIR}/${file}" ]; then
    cp "${SOURCE_DIR}/${file}" "${BUILD_DIR}/${file}"
  else
    # Create empty placeholder for missing files (optional)
    touch "${BUILD_DIR}/${file}"
    echo "// Placeholder for missing file: ${file}" > "${BUILD_DIR}/${file}"
  fi
done

# Copy screenshot if it exists
if [ -f "${SOURCE_DIR}/screenshot.png" ]; then
  cp "${SOURCE_DIR}/screenshot.png" "${BUILD_DIR}/"
fi

# Create and copy directories
echo "Copying directories..."
for dir in "${REQUIRED_DIRS[@]}"; do
  mkdir -p "${BUILD_DIR}/${dir}"
  if [ -d "${SOURCE_DIR}/${dir}" ]; then
    cp -r "${SOURCE_DIR}/${dir}/"* "${BUILD_DIR}/${dir}/" 2>/dev/null || true
  fi
done

# Create the zip file
echo "Creating zip file..."
# Change to the releases directory
cd "${RELEASE_DIR}" || { echo "Failed to change to releases directory"; exit 1; }

# Zip the theme directory
zip -r "${THEME_NAME}-${VERSION}.zip" "${THEME_NAME}" || { echo "Failed to create zip file"; exit 1; }

# Check if zip was successful
if [ $? -eq 0 ]; then
    echo "Release created successfully: ${OUTPUT_FILE}"
    echo "Theme: ${THEME_NAME}"
    echo "Version: ${VERSION}"
else
    echo "Error: Failed to create zip file."
    exit 1
fi

# List the contents of the zip file to verify
echo "Verifying zip contents:"
unzip -l "${THEME_NAME}-${VERSION}.zip" | grep -E "includes/|functions.php"

# Clean up the build directory (optional - uncomment if needed)
# rm -rf "${BUILD_DIR}"