module.exports = {
    purge: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: 'class', // or 'media' or 'class'
    theme: {
        extend: {
            spacing: {
                128: '32rem',
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
