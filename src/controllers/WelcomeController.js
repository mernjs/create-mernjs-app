const InitCommand	= require('../models/InitCommand')

class WelcomeController {

    async index(req, res){
        const data = await InitCommand.find()
        view(res, 'pages/welcome', 'Welcome', 'Get All Projects Successfully', data)
    }

    async details(req, res){
    	const data = await InitCommand.findOne({_id: req.query.project_id})
        view(res, 'pages/project-details', 'Project Details', 'Get Project Details Successfully', data)
    }

}

module.exports = new WelcomeController();