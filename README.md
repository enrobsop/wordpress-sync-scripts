# Ant & PHP scripts to sync dev and live environaments
## What does it do?
It's a collection of Ant and PHP scripts designed to simplify switching between _dev_ and _live_ WordPress websites. With these scripts, a developer can use a single command to download or upload a WordPress site, along with its database (optional). This way, the site can be worked on without risk to the live site content.

### Warning
1. __THIS SCRIPT DELETES! [Source control your files and data and/or make backups first!]__
2. It is also a few years old and there may be better ways to achieve this now.

## Functionality
* Allows a developer to work offline using a full *copy* of a WordPress website including the PHP source and database.
* Allows a developer to upload the new source code only or source code and data. A backup is also created during upload.

## Motivation
* Working on a live site directly is rarely advisable.
* Recent, real CMS content helps with offline development.
* Switching between _live_ and _dev_ environments increases the risk of deletion or corruption of live content.
* Shared-hosting packages, as used by many WordPress sites, provide limited tool sets for updating source code and data. FTP is often the only option - automating this process saves time and cuts down on errors.
* The content on the developer machine becomes outdated. It is very useful to be able to download the latest version of everything quickly and reliably. Especially, if ad-hoc coding changes have been performed directly on the server by 'someone else'.
* Being able to cleanly sync code allows for easier source-control and identification of bug causes.

## Requirements
* Ant is installed on the developer machine with the optional FTP jars.
* A local and remote MySQL database.

## Usage

### Setup
Simply download these scripts to the *root directory* of your WordPress application.

### Starting with a 'live' project.
1. Configure variables in `build.properties`.
2. Download the live site: `ant download`
4. Work on the website locally.
5. Upload the changes. `ant upload`

### Starting with a 'local' project.
// TODO

## Common problems
### Problem: `failed to create task or type ftp Cause: the class org.apache.tools.ant.taskdefs.optional.net.FTP was not found.`
FTP has not been configured for Ant. Please see the Ant documentation for details of the optional resources needed by FTP.
