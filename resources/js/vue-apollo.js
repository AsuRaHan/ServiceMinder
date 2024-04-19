import { ApolloClient, InMemoryCache, HttpLink, split } from '@apollo/client/core'
import { setContext } from '@apollo/client/link/context'

// Name of the localStorage item
const AUTH_TOKEN = 'apollo-token'

const cache = new InMemoryCache()
let link = new HttpLink({
    uri: '/graphql/',
})
link = setContext(async (_, { headers }) => {
    // get the authentication token from local storage if it exists
    const token = localStorage.getItem(AUTH_TOKEN);
    return {
        headers: {
            ...headers,
            authorization: token ? `Bearer ${token}` : "",
        },
    }
}).concat(link)
export const apolloClient = new ApolloClient({
    cache,
    link,
})

import { createApolloProvider } from '@vue/apollo-option'

export const apolloProvider = createApolloProvider({
    defaultClient: apolloClient,
})

// Manually call this when user log in
export async function onLogin (apolloClient, token) {
    localStorage.setItem(AUTH_TOKEN, token);
    try {
        await apolloClient.resetStore();
    } catch (e) {
        if (!isUnauthorizedError(e)) {
            console.log('%cError on cache reset (login)', 'color: orange;', e.message);
        }
    }
}

// Manually call this when user log out
export async function onLogout (apolloClient) {
    localStorage.removeItem(AUTH_TOKEN);
    try {
        await apolloClient.resetStore();
    } catch (e) {
        if (!isUnauthorizedError(e)) {
            console.log('%cError on cache reset (logout)', 'color: orange;', e.message);
        }
    }
}

function isUnauthorizedError (error) {
    const { graphQLErrors } = error
    return (graphQLErrors && graphQLErrors.some(e => e.message === 'Unauthorized'))
}
