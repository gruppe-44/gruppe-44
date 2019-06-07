import { CONSTANTS } from "../actions";

let listID = 2;
let cardID = 6;

// facite kort
const initialState = [

];



// facite board funskjoner på hva som skjer hvis du legger nye kort osv
const listsReducer = (state = initialState, action) => {
    switch (action.type) {
        case CONSTANTS.ADD_LIST:
            const newList = {
                title: action.payload,
                cards: [],
                id: `list-${listID}`
            };
            listID += 1;
            return [...state, newList];

            case CONSTANTS.ADD_CARD: {
                const newCard = {
                    text: action.payload.text,
                    id: `card-${cardID}`
                }
                cardID += 1;

                console.log("action recived", action);

                const newState = state.map(list => {
                    if(list.id === action.payload.listID) {
                        return {
                            ...list,
                            cards: [...list.cards, newCard]
                        };
                    } else {
                        return list;
                    }
                });

                return newState;
            }

                case CONSTANTS.DRAG_HAPPENED:

                    const {  
                        droppableIdStart,
                        droppableIdEnd,
                        droppableIndexEnd,
                        droppableIndexStart,
                        draggableId,
                        type
                    } = action.payload;
                    const newState = [...state];


                    //dragging lists around 
                    if(type === "list") {
                        const list = newState.splice(droppableIndexStart, 1);
                        newState.splice(droppableIndexEnd, 0, ...list);
                        return newState;
                    }

                    // in the same list
                    if(droppableIdStart === droppableIdEnd) {
                        const list = state.find(list => droppableIdStart === list.id);
                        const card = list.cards.splice(droppableIndexStart, 1)
                        list.cards.splice(droppableIndexEnd, 0, ...card)
                    }

                    // other list

                    if(droppableIdStart !== droppableIdEnd) {
                        // find the list where the drag happend
                        const listStart = state.find(list => droppableIdStart === list.id)
                    
                    // pull out the card from this list
                    const card = listStart.cards.splice(droppableIndexStart, 1);

                    // find the list where the drag ended
                    const listEnd = state.find(list => droppableIdEnd === list.id);
                    // put the card in a new list
                    listEnd.cards.splice(droppableIndexEnd, 0, ...card)
                    }

                    return newState;
                


        default:
            return state; 
    }
};

export default listsReducer;