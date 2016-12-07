export const updateActiveCellPosition = ({ dispatch }, rowIndex, columnIndex) => {
    dispatch('ACTIVE_CELL_POSITION', rowIndex, columnIndex);
};
export const updateNewTweet = ({ dispatch }, groupId, tweetId) => {
    dispatch('NEW_TWEET', groupId, tweetId);
};