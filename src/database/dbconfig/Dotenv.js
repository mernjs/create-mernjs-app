const _     =  require('lodash')
const fs    =  require('fs')
const path  =  require('path')

const dotenvConsoleLog = (message) => {
    console.log()
    console.log('\x1b[36m********************************************\x1b[0m')
    console.log('*********** \x1b[1m\x1b[32m'+message+'\x1b[0m **********')
    console.log('\x1b[36m********************************************\x1b[0m')
    console.log()
}

module.exports = (env) => {
    try {
        let envname = ''
        if(env){
            envname = `.env.${env}`
        }else{
            envname = '.env'
        }

        if(fs.existsSync(`${path.join(__dirname, '../../../')}/${envname}`)){
            // Load all the values from the .env file to override the process.env
            let env1 = fs.readFileSync(`${path.join(__dirname, '../../../')}/${envname}`, 'utf8').split("\n");
            _.each(env1, (key) => {
                let matches = key.match(/^([^=]+)=["']?(.*)["']?$/);
                if(matches) process.env[matches[1]] = matches[2];
            });
        
            // dotenvConsoleLog(`  Reading ${envname} File  `)
        }else{
            console.log('***********************************************')
            console.log('************** \x1b[5m\x1b[31mMissing .env File\x1b[0m **************')
            console.log('***********************************************')
            console.log()
        }        
        
    }catch (e) {
        console.log()
        console.log('***********************************************')
        console.log('************** \x1b[5m\x1b[31mMissing .env File\x1b[0m **************')
        console.log('***********************************************')
    }
}