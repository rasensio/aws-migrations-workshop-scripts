import axios from 'axios'

axios.defaults.baseURL = 'http://localhost:3000/'
// http://localhost:3000/monitor/backend/set-endpoint.php
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded'

const load = () => {
	console.log('load called')
}

/**
 * saves the endpoint in the server
 */
const	setEndpoint = async (endpoint) => {
	let path = 'set-endpoint.php'
	let res = await axios.post(path, {endpoint: endpoint})
	return res.data
}

/**
 * gets the endpoint from the server
 */
const	getEndpoint = async () => {
	let path = 'get-endpoint.php'
	let res = await axios.get(path)
	return res.data
}

export default {load, setEndpoint, getEndpoint}
