# Basic Starter Pack - Front End 

Basic starter pack
This starter pack use gulp as a taskrunner

## Installing

**Please note:** This Starter pack uses [npm](https://www.npmjs.com/) to manage project dependencies. To upgrade the Gulp Edition or to install plug-ins you'll need to be familiar with npm.

`npm` is a dependency management and package system which can pull in all of the Gulp Edition's dependencies for you. To accomplish this:

* download or `git clone` this repository to an install location.

* run the following

    ```
    cd install/location
    npm install
    ```

Running `npm install` from a directory containing a `package.json` file will download all dependencies defined within.

## Getting Started

The Pattern Lab Node - Gulp Edition ships with a [base experience](https://github.com/pattern-lab/starterkit-mustache-base) which serves as clean place to start from scratch with Pattern Lab. But if you want to get rolling with a starterkit of your own, or use the [demo starterkit](https://github.com/pattern-lab/starterkit-mustache-demo) like the one on [demo.patternlab.io](http://demo.patternlab.io), you can do so automatically at time of `npm install` by adding your starterkit to the `package.json` file.

You can also [work with starterkits using the command line](https://github.com/pattern-lab/patternlab-node/wiki/Importing-Starterkits).

### Generate

To generate files for production / Backend Dev:

    gulp build

### Watch for changes and re-generate

To watch for changes, re-generate the front-end, and server it via a BrowserSync server,  type:

    gulp dev

BrowserSync should open [http://localhost:8080](http://localhost:8080) in your browser.
