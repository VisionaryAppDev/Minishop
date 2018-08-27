import axios from 'axios'
export const EventBus = new Vue();


export default {
    getDailyReport(){
        return axios.get('http://127.0.0.1:8000/sales/daily-report')
        .then(response=>{
            console.log(response.data)
            return response.data
        })
    },
}