# Use the official Node.js 14 image as the base image
FROM node:21

# Set the working directory inside the container
WORKDIR /app

# Copy the package.json and package-lock.json files to the working directory
COPY package*.json ./

# Install the dependencies
RUN npm install

# Copy the rest of the application code to the working directory
COPY . .

# Build the Astro.js site
RUN npm run build

# Start the Astro.js site
ENV HOST="0.0.0.0"
ENV PORT="4321"
CMD ["node", "./dist/server/entry.mjs"]
