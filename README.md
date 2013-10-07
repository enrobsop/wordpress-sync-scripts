# What does it do?
It's a collection of Ant and PHP scripts designed to simplify the development process on live WordPress websites.

It permits a developer to use a single command to download a WordPress site along with it's database to a local development machine where it can be worked on with no risk to the live site.

### Warning
1. __THIS SCRIPT DELETES STUFF! [Source control of your files and data and/or make backups first!]__
2. This script(s) is a few years old now and there may be better ways to do this now. Please let me know.

## Motivation
* Working on a live site is rarely advisable anyway.
* CMS development is often greatly simplified when working with recent site content.
* Switching between _live_ and _dev_ databases on a dev machine risks live content being deleted or corrupted.
* Shared-hosting packages, as used by many WP sites, provide minimal tools to update source code and data. FTP is typically the only option - automating this is saves time and cuts down on errors.
* Updates may be spread out over time and the content on the developer machine quickly becomes outdated. It is very useful to be able to download the latest version of everything quickly. Especially, if ad-hoc coding changes have been performed directly on the server by 'someone else'.
* Being able to cleanly sync code allows for easier source-control and identification of bug causes.

## Functionality
* Allows a developer to work offline using a full *copy* of a WordPress website including the PHP source and database.
* Allows a developer to upload the new source code only or source code and data.

# Quick Start

## Starting with a 'live' project.
1. Configure variables in `build.properties`.
2. Download the live site: `ant download`
4. Work on the website until you are happy.
5. Upload the changes.

## Starting with a 'local' project.
...

# Requirements
* Ant is installed on the developer machine with the optional FTP jars.
* A local and remote MySQL database.

# Common problems
## Problem: failed to create task or type ftp Cause: the class org.apache.tools.ant.taskdefs.optional.net.FTP was not found.
FTP has not been configured for Ant. Please see the Ant documentation for details of the optional resources needed by FTP.