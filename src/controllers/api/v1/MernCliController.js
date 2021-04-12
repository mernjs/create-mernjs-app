const InitCommand           = require('../../../models/InitCommand')

class MernCliController {
    
    init(req, res){
        try{
            new InitCommand({...req.body, created_at: new Date()}).save()
            .then(data => {
                return apiResponse(res, 200, 'Run Init Command Successfully', data)
            }).catch(error => {
                return apiResponse(res, 500, error.message)
            })
        } catch (error) {
            return apiResponse(res, 500, error.message)
        }
    }

    version(req, res){
        try {
            return apiResponse(res, 200, 'Get Current CLI Version Successfully.', {cli_version: '1.0.5'})
        } catch (error) {
            return apiResponse(res, 500, error.message)
        }
    }

}

module.exports = new MernCliController();