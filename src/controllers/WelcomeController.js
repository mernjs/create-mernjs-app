const InitCommand	= require('../models/InitCommand')

class WelcomeController {

    async index(req, res){
        view(res, 'pages/welcome', 'Welcome', 'Welcome', [])
    }

    async projects(req, res){
        const data = await InitCommand.find()
        view(res, 'pages/projects', 'Projects', 'Get All Projects Successfully', data)
    }

    async details(req, res){
    	const data = await InitCommand.findOne({_id: req.query.project_id})
        view(res, 'pages/project-details', 'Project Details', 'Get Project Details Successfully', data)
    }

}

module.exports = new WelcomeController();