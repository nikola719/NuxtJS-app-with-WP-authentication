// import axios from "axios";

// export default axios.create({
//   baseURL: process.env.apiBaseUrl
// });

export default function({ $axios, store, redirect }) {
  // $axios.onError(error => {
  // 	if (error.response.status === 422) {
  // 		store.dispatch("validation/setErrors", error.response.data.errors);
  // 		// return redirect("/login");
  // 	}
  // 	return Promise.reject(error);
  // });
}
