import axios from 'axios'
export const EventBus = new Vue();

axios.defaults.baseURL = `http://127.0.0.1:8000/users`;

export default {
    getUserInfo(){
        return axios.get('/info')
        .then(response=>{
            console.log(response.data)
            return response.data
        })
    }

}