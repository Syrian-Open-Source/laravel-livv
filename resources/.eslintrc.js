module.exports = {
  extends: [
    'standard',
    'plugin:vue/recommended'
  ],
  globals: {
    axios: 'readable',
    route: 'readable',
    _: 'readable'
  },
  rules: {
    'comma-dangle': ['error', 'always-multiline'],
  },
}
