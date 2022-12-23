import { writable } from 'svelte/store'
export let users = writable([])

export const entrada = writable(
    localStorage.getItem('entrada') ? 
        JSON.parse(localStorage.getItem('entrada')) : 
        []
)