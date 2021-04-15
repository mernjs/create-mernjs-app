const InitCommand   = require('../../../models/InitCommand')
const nodemailer    = require('nodemailer');
const iplocation    = require("iplocation").default;

class MernCliController {
    
    init(req, res){
        try{
            new InitCommand({...req.body, created_at: new Date()}).save()
            .then(async data => {
                const location  = await iplocation(data.ip_address)
                sendMail({
                    email_ids: req.body.email,
                    subject: `Successfully created ${data.project_name} app`,
                    html: `<div style="width: 50%; margin-left: auto; margin-right: auto;">
                    <p>Hi ${data.os_username}</p>
                    <p>Successfully created to the following details.</p>   
                    <table style="font-family: arial, sans-serif; border-collapse: collapse; width: 100%; margin-left: auto; margin-right: auto;">
                      <tr>
                        <th colspan="2" style="border: 1px solid #dddddd; text-align: center; padding: 8px;">Project Details</th>
                      </tr>
                      <tr>
                        <td style="width: 30%; font-weight: bold; border: 1px solid #dddddd; text-align: left; padding: 8px;">App ID</td>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${data.app_id}</td>
                      </tr>
                      <tr>
                        <td style="width: 30%; font-weight: bold; border: 1px solid #dddddd; text-align: left; padding: 8px;">App Name</td>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${data.project_name}</td>
                      </tr>
                      <tr>
                        <td style="width: 30%; font-weight: bold; border: 1px solid #dddddd; text-align: left; padding: 8px;">App Type</td>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${data.project_type.split('-')[0]}</td>
                      </tr>
                      <tr>
                        <td style="width: 30%; font-weight: bold; border: 1px solid #dddddd; text-align: left; padding: 8px;">Node Version</td>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${data.node_version}</td>
                      </tr>
                      <tr>
                        <td style="width: 30%; font-weight: bold; border: 1px solid #dddddd; text-align: left; padding: 8px;">NPM Version</td>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${data.npm_version}</td>
                      </tr>
                      <tr>
                        <td style="width: 30%; font-weight: bold; border: 1px solid #dddddd; text-align: left; padding: 8px;">MernJs Version</td>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${data.cli_version}</td>
                      </tr>
                      <tr>
                        <td style="width: 30%; font-weight: bold; border: 1px solid #dddddd; text-align: left; padding: 8px;">Country</td>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${location.country}</td>
                      </tr>
                      <tr>
                        <td style="width: 30%; font-weight: bold; border: 1px solid #dddddd; text-align: left; padding: 8px;">Region</td>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${location.region}</td>
                      </tr>
                      <tr>
                        <td style="width: 30%; font-weight: bold; border: 1px solid #dddddd; text-align: left; padding: 8px;">OS Type</td>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${data.os_type}</td>
                      </tr>
                      <tr>
                        <td style="width: 30%; font-weight: bold; border: 1px solid #dddddd; text-align: left; padding: 8px;">Date</td>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${data.created_at}</td>
                      </tr>
                    </table>

                    <div>
                        <h4>Support</h4>
                        <p>
                            If you have any issues or bugs, report in our <a target="_blank" href="https://github.com/mernjs/create-mernjs-app/issues">Github.</a>
                        </p>
                        <p>Please email us, If you have any query or security concerns. you can reply to this message or <a target="_blank" href="mailto:>mernjscommunity@gmail.com">mernjscommunity@gmail.com</a>.</p>
                    </div>

                    <div>
                        <h4>Community</h4>
                        <p>
                            Follow us on 
                            <a target="_blank" href="https://www.facebook.com/">Facebook</a>, 
                            <a target="_blank" href="https://twitter.com/mernjs">Twitter</a>, 
                            <a target="_blank" href="https://www.linkedin.com/in/mernjs-community-269551191/">LinkedIn</a> and 
                            <a target="_blank" href="https://www.youtube.com/channel/UCAcmuHoa3sEN_KuwFYk6xMw/playlists">Youtube</a>
                            for updates, news, and information on the MERN.JS stack.
                        </p>
                        <p>
                          Join us on the <a target="_blank" href="https://gitter.im/mernjs/mernjs-community">Gitter Group</a> to discuss features, questions, and suggestions.
                        </p>
                    </div>

                    <div>
                        <h4>Links</h4>
                        <p>
                            <a class="nav-link" href="https://mernjs.org/"><b>Documentation</b></a>
                            <a class="nav-link" href="https://mernjs.org/installation"><b>Documentation</b></a>
                            <a class="nav-link" href="https://mernjs.org/versions"><b>Changelog</b></a>
                            <a class="nav-link" href="https://mernjs.org/live-demo"><b>Live Demo</b></a>
                            <a class="nav-link" href="https://mernjs.org/community"><b>Community</b></a>
                            <a class="nav-link" href="https://mernjs-blog.herokuapp.com"><b>Blog</b></a>
                        </p>
                    </div>
                    <div style="margin-top: 50px; margin-bottom: 50px;">
                    <p>Regards</p>
                    <p>MernJs Community</p>
                    </div>
                    </div>`,
                }).then(success => {
                    console.log('success', success)
                }).catch(error => {
                    console.log('catch', error.message)
                })
                return apiResponse(res, 200, `Successfully created ${data.project_name} app`, data)
            }).catch(error => {
                return apiResponse(res, 500, error.message)
            })
        } catch (error) {
            return apiResponse(res, 500, error.message)
        }
    }

    version(req, res){
        try {
            return apiResponse(res, 200, 'Get Current CLI Version Successfully.', {cli_version: '1.0.4'})
        } catch (error) {
            return apiResponse(res, 500, error.message)
        }
    }

    async sendMail(req, res){
        try {
            const data = await InitCommand.find()
            data.map((item, index) => {
                console.log('data', item.email)
                if(item.email !== null && item.email !== undefined){
                    sendMail({
                        email_ids: req.body.email,
                        subject: 'Successfully published create-mernjs-app@1.0.5',
                        html: `<div style="width: 50%; margin-left: auto; margin-right: auto;">
                        <p>Hi ${item.os_username}</p>
                        <p>A new version of the package create-mernjs-app (1.0.5) was published at April 14, 2021.</p>   
                        
                        <div>
                            <h4>Support</h4>
                            <p>
                                If you have any issues or bugs, report in our <a target="_blank" href="https://github.com/mernjs/create-mernjs-app/issues">Github.</a>
                            </p>
                            <p>Please email us, If you have any query or security concerns. you can reply to this message or <a target="_blank" href="mailto:>mernjscommunity@gmail.com">mernjscommunity@gmail.com</a>.</p>
                        </div>

                        <div>
                            <h4>Community</h4>
                            <p>
                                Follow us on 
                                <a target="_blank" href="https://www.facebook.com/">Facebook</a>, 
                                <a target="_blank" href="https://twitter.com/mernjs">Twitter</a>, 
                                <a target="_blank" href="https://www.linkedin.com/in/mernjs-community-269551191/">LinkedIn</a> and 
                                <a target="_blank" href="https://www.youtube.com/channel/UCAcmuHoa3sEN_KuwFYk6xMw/playlists">Youtube</a>
                                for updates, news, and information on the MERN.JS stack.
                            </p>
                            <p>
                              Join us on the <a target="_blank" href="https://gitter.im/mernjs/mernjs-community">Gitter Group</a> to discuss features, questions, and suggestions.
                            </p>
                        </div>
                        <div style="margin-top: 50px; margin-bottom: 50px;">
                        <p>Regards</p>
                        <p>MernJs Community</p>
                        </div>
                        </div>`,
                    }).then(success => {
                        console.log('success', success)
                    }).catch(error => {
                        console.log('catch', error.message)
                    })
                }
            })
            return apiResponse(res, 200, 'Mail Sent Successfully', success)
        } catch (error) {
            return apiResponse(res, 500, error.message)
        }
    }

}

module.exports = new MernCliController();