import React, {Component} from 'react';
import List from "./List";
import { connect } from "react-redux"
import FaciteActionButton from './FaciteActionButton';
import { DragDropContext, Droppable } from "react-beautiful-dnd";
import { sort } from "../actions";
import styled from "styled-components";


const ListContainer = styled.div`
  display: flex;
  flex-direction: row;
`

class App extends Component {
  onDragEnd = result => {
  const { destination, source, draggableId, type} = result;

    if(!destination) {
      return;
    }
    
    this.props.dispatch(
      sort(
        source.droppableId,
        destination.droppableId,
        source.index,
        destination.index,
        draggableId,
        type
      )
    )

  };

  // drag and drop og boards
  render() {
    const { lists } = this.props;
    return (
      <DragDropContext onDragEnd={this.onDragEnd}>
    <div className="App">
      <h2 style={{ textAlign: "center"}}>
        Facite
      </h2>
      <Droppable droppableId="all-lists" direction="horizontal" type="list">
        {provided => (
      <ListContainer{...provided.droppableProps} 
      ref={provided.innerRef}
    >
      { lists.map ((list, index) => (
      <List 
      listID={list.id} 
      key={list.id} 
      title={list.title} 
      cards={list.cards} 
      index={index}
    />
      ))}
      {provided.placeholder}
      <FaciteActionButton list />
        </ListContainer>    
        )}
      </Droppable>

      </div>
      </DragDropContext>
   );
  }
}
// for listene
const mapStateToprops = state => ({
  lists: state.lists
})


export default connect(mapStateToprops) (App);
