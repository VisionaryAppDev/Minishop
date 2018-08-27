import axios from 'axios'
export const EventBus = new Vue();


export default {
    getUserInfo(){
        return axios.get('http://127.0.0.1:8000/products/info')
        .then(response=>{
            console.log(response.data)
            return response.data
        })
    }

}