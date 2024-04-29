import { ref } from 'vue';
import axios from 'axios';

export default function useEmployees() {
    const url = "http://localhost:8000/api/user";
    const Employees = ref([]);
    const error = ref(null);

    const getAllEmployee = async () => {
        Employees.value = []; // Clear the existing array
        error.value = null;
        try {
            const res = await axios(url);
            Employees.value = res.data;
        } catch (err) {
            error.value = err;
        }
    }
    // Return the properties and methods
    return {
        Employees,
        error,
        getAllEmployee
    };
}

