import axios from "axios";
import { Task } from "../types/Task";

const getTasks = async ()=>{
    const { data } = await axios.get<Task[]>('api/foos')
    return data
}
const updateDoneTask = async ({ id, is_done }: Task) => {
    const { data } = await axios.patch<Task>(`/api/tasks/update-done/${id}`, { is_done: !is_done })
    return data
}
const createTask = async ( title: string) => {
    const { data } = await axios.post<Task>('api/foos', {title: title })
    return data
}
const updateTask = async ({ id, task }: {id: number, task: Task}) => {
    console.log(task)
    const { data } = await axios.patch<Task>(`/api/foos/${id}`, task)
    console.log(data)
    return data
}
const deleteTask = async ( id: number ) => {
    const { data } = await axios.delete<Task>(`/api/foos/${id}`)
    console.log(data)
    return data
}

export{
    getTasks,
    updateDoneTask,
    createTask,
    updateTask,
    deleteTask
}
